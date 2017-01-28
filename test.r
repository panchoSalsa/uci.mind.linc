if(!require(ggplot2)){
	install.packages("ggplot2", repos="http://cran.stat.ucla.edu")
}


args <- commandArgs(TRUE)
tosplit <- args[1]
#gaplinc/tosplit <- "0.09,0,0,0,0,0,0,0.16,0,0,0,0.33,0,1.02,0.38,0.58,62.26,79.6,77.35,14.39,38.12,13.95,0.76,0.37,0.67,0.47,0.27,0.15,0.23,0,0.25"
categories <- c(5,4,2,5,3,3,4,3,2)
input <- as.double(unlist(strsplit(tosplit, ",")))
dat <- as.data.frame(matrix(seq(), nrow = 2, ncol = 9))
colnames(dat) <- c("MCD14", "MCD16", "DC", "iHPC", "FetalMicroglia", "AdultMicroglia", "iPSC", "FA", "NeuralStem")
counter<-1
for(i in 1:length(categories)){
	temp<-double(length=categories[i])
	for(j in 1:categories[i]){
		temp[j]<-input[counter]
		counter<-counter+1
	}
	dat[1,i] <- mean(temp)
	dat[2,i] <- sd(temp)
}
dat<-tibble::rownames_to_column(data.frame(t(dat)))


dat$rowname <- factor(dat$rowname, levels=rev(c("DC","MCD14", "MCD16", "iPSC", "iHPC", "NeuralStem", "FetalMicroglia", "AdultMicroglia", "FA")))
rnaplot<-ggplot2::ggplot(data=dat,
		ggplot2::aes(x=dat$rowname,y=dat$X1,fill=dat$rowname))+
	ggplot2::geom_bar(stat="identity")+
	ggplot2::coord_flip()+xlab("")+ylab("fpkm")+ggplot2::scale_fill_brewer(palette = "Spectral")+
	theme(legend.title = element_blank())+ggplot2::geom_errorbar(ggplot2::aes(ymin = (dat$X1-dat$X2), ymax=(dat$X1 + dat$X2)))+
	ggplot2::ggtitle(args[2])
ggplot2::ggsave(filename = "temp.png", plot = rnaplot, dpi = 300)


